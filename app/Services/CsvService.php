<?php


namespace App\Services;


use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvService
{

    /**
     * @param $list
     * @param $filename
     * @param array $header
     * @return StreamedResponse
     */
    public function streamDownload($list, $filename, $header=null) : StreamedResponse
    {
        # add headers for each column in the CSV download
        if (!$header) {
            $header = array_keys($list[0]);
        }
        // TODO check if $header size is the same as number of columns is list
        array_unshift($list, $header);

        return response()->streamDownload(function () use (&$list) {
            echo $this->arrayToCsv($list);
        }, $filename);
    }

    private function arrayToCsv(array $fields, $delimiter = ',', $enclosure = '"',
                                $encloseAll = false, $nullToMysqlNull = false)
    {
        $delimiter_esc = preg_quote($delimiter, '/');
        $enclosure_esc = preg_quote($enclosure, '/');

        $outputString = "";
        foreach ($fields as $tempFields) {
            $output = array();
            foreach ($tempFields as $field) {
                if ($field === null && $nullToMysqlNull) {
                    $output[] = 'NULL';
                    continue;
                }

                // Enclose fields containing $delimiter, $enclosure or whitespace
                if ($encloseAll || preg_match("/(?:${delimiter_esc}|${enclosure_esc}|\s)/", $field)) {
                    $field = $enclosure . str_replace($enclosure, $enclosure . $enclosure, $field) . $enclosure;
                }
                $output[] = $field . " ";
            }
            $outputString .= implode($delimiter, $output) . "\r\n";
        }
        return $outputString;
    }


}
