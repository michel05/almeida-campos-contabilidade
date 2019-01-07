<?php
if(!defined('__NAME_XML_ATTRIBUTES')) define('__NAME_XML_ATTRIBUTES', '__attributes');
if(!defined('__NAME_XML_TEXT')) define('__NAME_XML_TEXT', '__text');

/**
 * The {@link XmlParser} object is used to parse XML into a php array.
 * 
 * @author William Brooks <William.B@incuBeta.com>
 * @package default
 */
class XmlParser {
    private $stack;
    private $stackCount;
    private $old;

    private function startElement($parser, $name, $attrs) {
        // ensure that the parent element on the stack is an array.
        // This will overwrite any text data for the parent element.
        if(!is_array($this->stack[$this->stackCount])) {
            $this->stack[$this->stackCount] = array();
        }

        $current = array();
        if(!isset($this->stack[$this->stackCount][$name])) {
            $this->stack[$this->stackCount][$name] = &$current;
        } else {
            if(!isset($this->stack[$this->stackCount][$name][0])) {
                $this->old = $old = $this->stack[$this->stackCount][$name];
                $this->stack[$this->stackCount][$name] = array($old);
            }

            array_push($this->stack[$this->stackCount][$name], $current);
        }
        // Initialise this element onto the parent element

        // Add this element to the end of the stack
        array_push($this->stack, $current);

        // If there are attributes, add it to the current element.
        if($attrs) {
            $current[__NAME_XML_ATTRIBUTES] = $attrs;
        }

        // Increment the current stack count (faster than counting the stack each time)
        $this->stackCount++;
    }

    private function endElement($parser, $name) {
        // Remove the last element on the stack
        array_pop($this->stack);

        // Decrement the stack count
        $this->stackCount--;
    }

    private function text($parser, $data) {
        // Trim the text data
        $data = trim($data);

        // If there is no text (i.e. only whitespace), return.
        if(!$data) return;

        // If the current parent element is not an array (i.e. it doesn't contain any child elements),
        // assign it the text value.
        $this->stack[$this->stackCount][__NAME_XML_TEXT] = $data;
    }

    /**
     * Parses an xml file, and returns it as an array.
     *
     * @param string $filename The xml file to parse.
     * @return mixed An array containing the xml data.
     * @throws Exception If the xml is invalid, or, if the file doesn't exist, is not readable, or is a directory.
     */
    public function parseFile($filename) {
        if(!file_exists($filename) || is_dir($filename) || !is_readable($filename)) {
            throw new Exception('Error reading file: ' . $filename);
        }

        $data = file_get_contents($filename);
        if(!$data) {
            throw new Exception('Error reading file: ' . $filename);
        }

        return $this->parse(data);
    }

    /**
     * Parses an xml string, and returns it as an array.
     *
     * @param string $xml The xml string to parse.
     * @return mixed An array containing the xml data.
     * @throws Exception If the xml is invalid
     */
    public function parse($xml) {
        // initialise stuffs
        $this->stack = array();
        $this->stackCount = 0;

        // create the parser
        $parser = xml_parser_create();

        // set the object that contains callback methods
        xml_set_object($parser, $this);

        // Set the callback method handlers
        xml_set_element_handler($parser, 'startElement', 'endElement');
        xml_set_character_data_handler($parser, 'text');

        // Set parser options
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, true);
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, false);

        // parse the document
        if(!@xml_parse($parser, $xml)) {
            $error_code = xml_get_error_code($parser);
            throw new Exception('XML Error on line ' . xml_get_current_line_number($parser) . ': [' . $error_code . '] ' . xml_error_string($error_code));
        }

        // Free the resource
        xml_parser_free($parser);


        //print_r($this->old);

        // Pop the last element off the stack, and return it
        return array_pop($this->stack);
    }
}
?>