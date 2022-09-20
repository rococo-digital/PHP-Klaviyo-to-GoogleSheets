
<?php 

class GoogleSheetIntegration{
    private $client;

    function __construct() {
        $this->client = new \Google_Client();

        $this->client->setApplicationName('lanes-klaviyo-integration');

        $this->client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

        $this->client->setAccessType('offline');

        $this->client->setAuthConfig(__DIR__ . '/credentials.json');
      }

    function connectToSheet(){
        
        $service = new Google_Service_Sheets($this->client);

        $spreadsheetId = $_ENV['SPREADSHEET_ID']; //It is present in your URL

        $get_range = "Sheet1!A1:A2";

        //Request to get data from spreadsheet.

        $response = $service->spreadsheets_values->get($spreadsheetId, $get_range);

        $values = $response->getValues();

        var_dump($values);
    }

    function updateSheet($data){
        
        $service = new Google_Service_Sheets($this->client);

        $spreadsheetId = $_ENV['SPREADSHEET_ID']; //It is present in your URL

        $update_range = "Sheet1!A:Z";

        var_dump(array_values($data));

        $body = new Google_Service_Sheets_ValueRange([

            'values' => array_values($data)
      
          ]);
      
          $params = [
      
            'valueInputOption' => 'RAW'
      
          ];




          $update_sheet = $service->spreadsheets_values->update($spreadsheetId, $update_range, $body, $params);

    }
}