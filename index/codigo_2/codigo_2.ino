#define BLYNK_TEMPLATE_ID "TMPL2zEJ8uDb4"
#define BLYNK_TEMPLATE_NAME "Monitoreo IoT"
#define BLYNK_AUTH_TOKEN "QK8PA3gvf-fxHSxdifnO7zbUeK4xYVHa"
#define BLYNK_PRINT Serial
#include <WiFi.h>
#include <WiFiClient.h>
#include <BlynkSimpleEsp32.h>

BlynkTimer timer;

char network[] = "Wifi";
char password[] = "12345678";


#include "DHT.h"
#define DHTPIN 27 
#define DHTTYPE DHT11 

DHT dht(DHTPIN, DHTTYPE);

void readSensor(){
  
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  if (isnan(h) || isnan(t)) {
    Serial.println(F("Failed to read from DHT sensor!"));
    return;
  }

  Blynk.virtualWrite(V0,h);
  Blynk.virtualWrite(V1,t);
  
  Serial.print(F("Humidity: "));
  Serial.print(h);
  Serial.print(F("%  Temperature: "));
  Serial.print(t);
  Serial.print(F("°C "));

}


void setup() {
  Serial.begin(115200);
  Blynk.begin(BLYNK_AUTH_TOKEN,network,password);
  dht.begin();
  timer.setInterval(2000L,readSensor);

}

void loop() {
 Blynk.run();
 timer.run();

}
