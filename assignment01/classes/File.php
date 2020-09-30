<?php

class File
{
    private $fileName = "data/";

    /**
     * Constructor sets the name of the file when initialized.
     * @param $fileName - Should describe the content of the file. Example: studentsDatabase.csv or gradesDatabase.csv
     */
    function __construct($fileName)
    {
        $this->fileName .= $fileName;
    }

    /**
     * Creates a .csv file in the root folder.
     * 
     * @param $content - One array that contains multiple arrays - Content of the file. 
     *                   Keys of the first array will be set as the headings in the csv file
     */
    function createFile($content)
    {
        $file = fopen($this->fileName, "w") or die("Failed to load file!");
        fputcsv($file, array_keys($content[0]));
        foreach ($content as $data) {
            fputcsv($file, $data);
        }
        fclose($file);
    }

    /**
     * Returns the content of a file as an array.
     * File headings will be set as the array keys
     */
    function getFileContent()
    {
        if (file_exists($this->fileName)) {
            $file = fopen($this->fileName, "r") or die("Failed to load file!");
            $headersData = fgets($file);
            $headers = explode(',', $headersData);
            $headers = $this->removeWhitespaceAndQuotes($headers);
            $contentArray = [];
            while (($line = fgets($file)) !== false) {
                $tempContent = explode(',', $line);
                // Remove whitespace from the strings in the array
                $tempContent = $this->removeWhitespaceAndQuotes($tempContent);
                // Make the title of the information the key of the array objects
                // makes it easier to get a specific value. Example "Grade"
                $content = array_combine($headers, $tempContent);
                array_push($contentArray, $content);
            }
            fclose($file);
            return $contentArray;
        } else {
            print("<p>The " . $this->fileName . " file does not exist. Please upload the data.csv file at the <a href='data.php'>data.php</a> page!</p>");
            exit();
        }
    }

    /**
     * Funtion takes an array of strings. Removes the whitespace around the strings.
     * Returns a new array of strings with no whitespace
     */
    private function removeWhitespaceAndQuotes($array)
    {
        foreach ($array as $key => $string) {
            $string = trim($string);
            $string = trim($string, '"');
            $array[$key] = $string;
        }
        return $array;
    }
}
