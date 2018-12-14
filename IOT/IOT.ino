#include <ESP8266WiFi.h>
#include "DHT.h"
#include "LiquidCrystal_I2C.h"
#define DHTPIN D3
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

const char *ssid =  "Redmi4A";
const char *pass =  "21112017";
const char *server = "nguyentrankha.000webhostapp.com";

WiFiClient client;

volatile float h = 0;
volatile float t = 0;
volatile float f = 0;
LiquidCrystal_I2C lcd(0x27, 16, 2);

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  dht.begin();
  lcd.begin(16,2);
  lcd.backlight();
  lcd.init();
  WiFi.begin(ssid, pass);
       
 
      while (WiFi.status() != WL_CONNECTED) 
     {
            delay(500);
            Serial.print(".");
     }
      Serial.println("");
      Serial.println("WiFi connected");
}

void loop() {
  // put your main code here, to run repeatedly:
  h = dht.readHumidity();
  t = dht.readTemperature();
  
  delay(2000);
  if (isnan(h) || isnan(t)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }
  
  String Temperature = "Temp:" + String(t) + "'C";
  String Humidity = "Humi:" + String(h) + "%";

  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print(Temperature);
  lcd.setCursor(0,1);
  lcd.print(Humidity);


  String postStr = "";
 
   if(client.connect(server, 80))
   {
      postStr +="nhietdo=";
      postStr += String(t);
      postStr +="&doam=";
      postStr += String(h);
      postStr +="&co=";
      postStr += String(f);
      
      client.print("POST /upload.php HTTP/1.1\n");
      client.print("Host: nguyentrankha.000webhostapp.com\n");
      client.print("Content-Type: application/x-www-form-urlencoded\n");
      client.print("Content-Length: ");
      client.print(postStr.length());
      client.print("\n\n");
      client.print(postStr);      
      delay(3000);
      Serial.println(postStr);
   }
   client.stop();
  
  
  Serial.print("Humidity: ");
  Serial.print(h);
  Serial.print(" %\t");
  Serial.print("Temperature: ");
  Serial.print(t);
  Serial.println(" *C ");  
}
