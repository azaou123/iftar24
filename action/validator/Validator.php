<?php

include 'simple_html_dom.php';
class Validator
{
    private $url;
    private $formData;

    public function __construct($url, $formData)
    {
        $this->url = $url;
        $this->formData = $formData;
    }

    public function fetchData()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->formData);
        $output = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }
        curl_close($ch);
        return $output;
    }

    private function extractH3Elements($html)
    {
        $data = [];
        // Parse the HTML content using Simple HTML DOM Parser
        $htmlObject = str_get_html($html);
        foreach ($htmlObject->find('h3') as $h3Element) {
            $data[] = $h3Element->plaintext . PHP_EOL;
        }
        // Release the memory used by the Simple HTML DOM Parser
        $htmlObject->clear();
        unset($htmlObject);
        return $data;
    }

    public function extractData($html)
    {
        $data = $this->extractH3Elements($html);

        // Extract data from the table
        $htmlObject = str_get_html($html);
        foreach ($htmlObject->find('.table-striped tbody tr') as $row) {
            $data[] = $row->find('td', 1)->plaintext; // Change the index based on the column you want to extract
        }

        // Release the memory used by the Simple HTML DOM Parser
        $htmlObject->clear();
        unset($htmlObject);

        return $data;
    }

    
}


?>
