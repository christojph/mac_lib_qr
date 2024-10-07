#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <SoftwareSerial.h>

SoftwareSerial s(D6,D5);
  int pos;
 
#define AP_SSID "QRsystem"
#define AP_PASS "novianhub@2021"


String device_token  ="6c4ce926d5971fbd"; 
String URL ="http://192.168.4.2/qrsystem/getdata.php"; // 192.168.1.110 computer IP or the server domain
String getData, Link;

String ID;
int dataIn; 

void setup() 
{
  pinMode(LED_BUILTIN, OUTPUT);     
  pinMode(D8, OUTPUT);
  pinMode(D7, OUTPUT);
  pinMode(D0, OUTPUT);
  Serial.begin(115200);
  s.begin(9600);
connectToWiFi();
}



void loop() 
{


     while (WiFi.softAPgetStationNum()==0)
    {
      delay(50);
      Serial.print(".");
      digitalWrite(LED_BUILTIN,HIGH);
      delay(50);
      digitalWrite(LED_BUILTIN,LOW);
      digitalWrite(D0 ,HIGH);
      delay(50);
      digitalWrite(D0, LOW);
      delay(50);
    } 


  cardreed();
   
}


void cardreed()
{
 while (s.available() > 0)
{
    ID="";
 unsigned long dataIn = s.parseInt();
  byte digitArray[6]; 
  for(int i = 5; i>=0; i--)
  {
    digitArray[i] = dataIn%10;
    dataIn = dataIn/10; 
  }
 /*Serial.print(digitArray[0]);
  Serial.print(digitArray[1]);
  Serial.print(digitArray[2]);
  Serial.print(digitArray[3]);
  Serial.print(digitArray[4]);
  Serial.print(digitArray[5]);*/
  Serial.println();
  if(digitArray[1]==0&&digitArray[2]==0&&digitArray[3]==0&&digitArray[4]==0)
  {
    Serial.println("Wrong ID");
  }
  else 
  {

 ID += String(digitArray[1]);
 ID += String(digitArray[2]);
 ID += String(digitArray[3]);
 ID += String(digitArray[4]);
 ID += String(digitArray[5]);
     //Serial.println(ID );
     SendCardID(ID);
  }


 }}

void SendCardID(String ID)
{
      
 
   WiFiClient client; 
    HTTPClient http;   
    //GET Data
    getData = "?card_uid=" + String(ID) + "&device_token=" + String(device_token); // Add the Card ID to the GET array in order to send it
    //GET methode
    Link = URL + getData;
    Serial.println(Link);
    http.begin(client,Link);

    int httpCode = http.GET();   
    String payload = http.getString();   

    //Serial.println(Link); 
    Serial.println(httpCode);   
   // Serial.println(Card_uid);   
    Serial.println(payload);    

    if(httpCode== -1)
    {
      int  i=0;
     for(i;i<=10;i++)
     {
      digitalWrite(D0 ,HIGH);
      delay(250);
      digitalWrite(D0, LOW);
      delay(50);
      digitalWrite(D0, HIGH);
      delay(50);
      digitalWrite(D0, LOW);
      delay(250);
     }}
    if (httpCode == 200) 
    {
  
      if (payload.substring(0, 5) == "login")
      {

        String user_name = payload.substring(5);
    // Serial.println(user_name);
      digitalWrite(D8, HIGH);
      delay(2000);
      digitalWrite(D8, LOW);
      delay(2000);


      }
      else if (payload.substring(0, 6) == "logout") 
      {
        String user_name = payload.substring(6);
     //Serial.println(user_name);
      digitalWrite(D7, HIGH);
      delay(2000);
      digitalWrite(D7, LOW);
      delay(2000);
        
      }
      else if (payload == "succesful")
      {
Serial.println("OK");
      }
      else if (payload == "available")
      {
Serial.println("OKk");
      }
      else if (payload == "Not found!")
      {
      digitalWrite(D0 ,HIGH);
      delay(3000);
      digitalWrite(D0 ,LOW);
      }
      delay(100);
      http.end(); 
    }
  }

void connectToWiFi()
{
  WiFi.mode(WIFI_AP);
  WiFi.softAP(AP_SSID, AP_PASS);
  Serial.print("IP address for network ");
  Serial.print(AP_SSID);
  Serial.print(" : ");
  Serial.print(WiFi.softAPIP());

}
