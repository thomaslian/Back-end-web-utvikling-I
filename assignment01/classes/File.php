<?php

class File
{
    // Set the part of the filename as "data" as it will be in that folder
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
     * @param $content - One array that contains multiple arrays - The content of the file. 
     *                   Keys of the first array will be set as the headings in the csv file
     */
    function createFile($content)
    {
        // Load file, die if not 
        $file = fopen($this->fileName, "w") or die("Failed to load file!");
        // Save the headings in the file
        fputcsv($file, array_keys($content[0]));
        // Go through the rest of the array and save it in the file
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
        // Check if file exists
        if (file_exists($this->fileName)) {
            // Open the file, or die
            $file = fopen($this->fileName, "r") or die("Failed to load file!");
            // Get the first line of the file
            $headersData = fgets($file);
            // Get the data and save it in an array
            $headers = explode(',', $headersData);
            // Remove all whitespace and quotes
            $headers = $this->removeWhitespaceAndQuotes($headers);
            // Crate an array for the rest of the file
            $contentArray = [];
            // As long as there is an line left in the file, continue the loop
            while (($line = fgets($file)) !== false) {
                // Get the data of the line and save it in an array
                $tempContent = explode(',', $line);
                // Remove whitespace from the strings in the array
                $tempContent = $this->removeWhitespaceAndQuotes($tempContent);
                // Make the title of the information the key of the array objects
                // makes it easier to get a specific value. Example "Grade"
                $content = array_combine($headers, $tempContent);
                // Push the array from the line to the content array
                array_push($contentArray, $content);
            }
            // Close the file
            fclose($file);
            // Return the content of the file
            return $contentArray;
        } else {
            // Print an error if the file cannot be opened and exit the code
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
        // Go through each item in the array
        foreach ($array as $key => $string) {
            // Remove whitespace
            $string = trim($string);
            // Remove quotes
            $string = trim($string, '"');
            // Add the variable back to the array
            $array[$key] = $string;
        }
        // Return array without whitespace and quotes
        return $array;
    }
}
