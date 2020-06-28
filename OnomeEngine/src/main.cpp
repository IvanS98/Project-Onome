// Project Onome Source Code for ATMEGA 2560 Microcontroller
// (C) 2017-2018 Ivan S. All rights reserved.

// Including required libraries
#include <Arduino.h>
#include <DHT.h>
#include <Servo.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>

// Declaring type of LCD I2C Display
LiquidCrystal_I2C lcd(0x27, 2, 1, 0, 4, 5, 6, 7, 3, POSITIVE);

// Defining DHT11 model temperature and humidity sensor
#define DHTSensorPin 2
#define DHTSensorType DHT11

// Linking sensor pin and sensor type into a variable called dht
DHT dht(DHTSensorPin, DHTSensorType);

// Lights
int light_aisle1 = 26;
int light_aisle2 = 28;
int light_aisle3 = 36;
int light_aisle4 = 40;
int light_living1 = 29;
int light_living2 = 31;
int light_living3 = 37;
int light_bedroom1 = 27;
int light_bedroom2 = 32;
int light_bedroom3 = 33;
int light_bedroom4 = 41;
int light_bedroom5 = 39;
int light_kitchen1 = 24;
int light_kitchen2 = 25;
int light_kitchen3 = 38;
int light_kitchen4 = 35;
int light_bathroom = 23;
int light_garage = 22;

// Misc
int buzzer = 42;
int sim900 = 10;
int buzzer_error;
char pi_command = '0';

int i;

// Provide data for Onome HomeGate
int angleincrement = 1;
int angle;
Servo OnomeHomeGate1;

// Onome System Version

char onomeVersion[] = "0.9_180603_1496";

// How does DHT sensor measure temperature

// Declaring some floats to measure DHT
	int DHTtempMeasure;
	int DHTtempVal;
	int DHTtempTotal;
	int DHTtempAverage;
	int DHThumMeasure;
	int DHThumVal;
	int DHThumTotal;
	int DHThumAverage;

void onomeDHTSensorTempGet() {
	Serial.println("[DHT] Measuring temperature...");
	for (DHTtempMeasure = 0; DHTtempMeasure < 50; DHTtempMeasure++) {
		DHTtempVal = dht.readTemperature();
		DHTtempTotal = DHTtempTotal + DHTtempVal;
	}
	DHTtempAverage = DHTtempTotal / 50;
	DHTtempTotal = 0;
}

// How does DHT sensor measure humidity

void onomeDHTSensorHumGet() {
	Serial.println("[DHT] Measuring humidity...");
	for (DHThumMeasure = 0; DHThumMeasure < 50; DHThumMeasure++) {
		DHThumVal = dht.readHumidity();
		DHThumTotal = DHThumTotal + DHThumVal;
	}
	DHThumAverage = DHThumTotal / 50;
	DHThumTotal = 0;
}

// Next, it's important to configure lights as output, sensor as input, and open the serial communication between the Raspberry and the ATMEGA 2560.
void setup() {
	// Setup I/O pins for Lights
	pinMode(light_aisle1, OUTPUT);
	pinMode(light_aisle2, OUTPUT);
	pinMode(light_aisle3, OUTPUT);
	pinMode(light_aisle4, OUTPUT);
	pinMode(light_living1, OUTPUT);
	pinMode(light_living2, OUTPUT);
	pinMode(light_living3, OUTPUT);
	pinMode(light_bedroom1, OUTPUT);
	pinMode(light_bedroom2, OUTPUT);
	pinMode(light_bedroom3, OUTPUT);
	pinMode(light_bedroom4, OUTPUT);
	pinMode(light_bedroom5, OUTPUT);
	pinMode(light_kitchen1, OUTPUT);
	pinMode(light_kitchen2, OUTPUT);
	pinMode(light_kitchen3, OUTPUT);
	pinMode(light_kitchen4, OUTPUT);
	pinMode(light_bathroom, OUTPUT);
	pinMode(light_garage, OUTPUT);

	// ..and for DHT
	pinMode(DHTSensorPin, INPUT);

	// ..and for the photoresistor
	pinMode(A0, INPUT);

	// ..and for the SIM900 module
	pinMode(sim900, OUTPUT);

	// LCD Initialization
	lcd.begin(16,2);
	lcd.backlight();

	// HomeGate Pin
	OnomeHomeGate1.attach(9);

	Serial.begin(9600);
	// Onome Welcome Message
	Serial.println("====== WELCOME TO PROJECT ONOME ======");
	Serial.println(" ");
	Serial.print("System version ");
	Serial.println(onomeVersion);
	Serial.println("(C) 2017-2018 Ivan Sollazzo. All rights reserved.");
	Serial.println(" ");
	lcd.clear();
	lcd.setCursor(2,0);
	lcd.print("Welcome to");
	lcd.setCursor(1,1);
	lcd.print("Project Onome");
	delay(2000);
	lcd.clear();
	// Show temperature and humidity during system startup
	Serial.println("[Onome] Starting DHT service...");
	onomeDHTSensorTempGet();
	onomeDHTSensorHumGet();
	lcd.setCursor(0,0);
	lcd.print("Temperature");
	lcd.setCursor(12,0);
	lcd.print(DHTtempAverage);
	lcd.setCursor(14,0);
	lcd.print((char)223);
	lcd.setCursor(15,0);
	lcd.print("C");
	lcd.setCursor(0,1);
	lcd.print("Humidity");
	lcd.setCursor(9,1);
	lcd.print(DHThumAverage);
	lcd.setCursor(11,1);
	lcd.print("%");
	// Show loading status
	lcd.setCursor(13,1);
	lcd.print("...");
	// SecurDude Service
	Serial.println("[Onome] Starting SecurDude...");
	delay(100);
	Serial.println("[SecurDude] Initializing sensors...");
	delay(100);
	// HomeGate Initialization System
	Serial.println("[Onome] Starting HomeGate...");
	delay(100);
	Serial.print("[HomeGate] Initializing...");
	delay(2000);
	for (angle = 0; angle >= 90; angle -= angleincrement) {
		OnomeHomeGate1.write(angle);
		delay(100);
	}
	delay(1000);
	Serial.println(". OKAY!");
	Serial.println("[HomeGate] Initialization complete! HomeGate ready!");
	delay(100);
	Serial.println("[Onome] All done. System ready!");
	// Hide loading status
	lcd.setCursor(13,1);
		lcd.print("   ");
}

// Now, let's create voids for every single action the microcontroller will do.
// What the microcontroller has to do if DHT Sensor is enabled.

void onomeDHTSensorOn() {
	onomeDHTSensorTempGet();
	onomeDHTSensorHumGet();
	lcd.setCursor(0,0);
	lcd.print("Temperature");
	lcd.setCursor(12,0);
	lcd.print(DHTtempAverage);
	lcd.setCursor(14,0);
	lcd.print((char)223);
	lcd.setCursor(15,0);
	lcd.print("C");
	lcd.setCursor(0,1);
	lcd.print("Humidity");
	lcd.setCursor(9,1);
	lcd.print(DHThumAverage);
	lcd.setCursor(11,1);
	lcd.print("%");
	Serial.print("[DHT] Temperature is ");
	Serial.print(DHTtempAverage);
	Serial.println("°C");
	Serial.print("[DHT] Humidity is ");
	Serial.print(DHThumAverage);
	Serial.println("%");
	delay(100);
}

// ... if DHT Sensor is disabled.
void onomeDHTSensorOff() {
	lcd.setCursor(12,0);
		lcd.print("0 ");
		lcd.setCursor(9,1);
		lcd.print("0 ");
	Serial.println("[DHT] Sensor is disabled!");
	tone(buzzer, 1000, 100);
	// Because the OS has also some scripts, the part of killing them is assigned to Linux.
}

// ... if Light automation is enabled.
void onomeLightAutomationOn() {
	Serial.println("[Autolights] Checking photoresistor value...");
	int photoresistor_value = analogRead(A0);
	if (photoresistor_value > 800) {
		digitalWrite(light_aisle1, HIGH);
		digitalWrite(light_aisle2, HIGH);
		digitalWrite(light_aisle3, HIGH);
		digitalWrite(light_aisle4, HIGH);
		digitalWrite(light_living1, HIGH);
		digitalWrite(light_living2, HIGH);
		digitalWrite(light_living3, HIGH);
		digitalWrite(light_bedroom1, HIGH);
		digitalWrite(light_bedroom2, HIGH);
		digitalWrite(light_bedroom3, HIGH);
		digitalWrite(light_bedroom4, HIGH);
		digitalWrite(light_bedroom5, HIGH);
		digitalWrite(light_kitchen1, HIGH);
		digitalWrite(light_kitchen2, HIGH);
		digitalWrite(light_kitchen3, HIGH);
		digitalWrite(light_kitchen4, HIGH);
		digitalWrite(light_bathroom, HIGH);
		digitalWrite(light_garage, HIGH);
	}
	else {
		digitalWrite(light_aisle1, LOW);
		digitalWrite(light_aisle2, LOW);
		digitalWrite(light_aisle3, LOW);
		digitalWrite(light_aisle4, LOW);
		digitalWrite(light_living1, LOW);
		digitalWrite(light_living2, LOW);
		digitalWrite(light_living3, LOW);
		digitalWrite(light_bedroom1, LOW);
		digitalWrite(light_bedroom2, LOW);
		digitalWrite(light_bedroom3, LOW);
		digitalWrite(light_bedroom4, LOW);
		digitalWrite(light_bedroom5, LOW);
		digitalWrite(light_kitchen1, LOW);
		digitalWrite(light_kitchen2, LOW);
		digitalWrite(light_kitchen3, LOW);
		digitalWrite(light_kitchen4, LOW);
		digitalWrite(light_bathroom, LOW);
		digitalWrite(light_garage, LOW);
	}
	Serial.print("[Autolights] Photoresitor's value is: ");
	Serial.println(photoresistor_value);
}

// ... if Light automation is disabled.
void onomeLightAutomationOff() {
	Serial.println("[Autolights] Light automation is disabled!");
}

// Now every action is about lights...what happens if lights enabled, disabled, etc, for every room. Rooms are living, bathroom, kitchen, bedroom and garage.

void onomeAisleLightsOn() {
	digitalWrite(light_aisle1, HIGH);
	digitalWrite(light_aisle2, HIGH);
	digitalWrite(light_aisle3, HIGH);
	digitalWrite(light_aisle4, HIGH);
	Serial.println("[Onome] Aisle lights turned on!");
}

void onomeAisleLightsOff() {
	digitalWrite(light_aisle1, LOW);
	digitalWrite(light_aisle2, LOW);
	digitalWrite(light_aisle3, LOW);
	digitalWrite(light_aisle4, LOW);
	Serial.println("[Onome] Aisle lights turned off!");
}

void onomeLivingLightsOn() {
	digitalWrite(light_living1, HIGH);
	digitalWrite(light_living2, HIGH);
	digitalWrite(light_living3, HIGH);
	Serial.println("[Onome] Living lights turned on!");
}

void onomeLivingLightsOff() {
	digitalWrite(light_living1, LOW);
	digitalWrite(light_living2, LOW);
	digitalWrite(light_living3, LOW);
	Serial.println("[Onome] Living lights turned off!");
}

void onomeKitchenLightsOn() {
	digitalWrite(light_kitchen1, HIGH);
	digitalWrite(light_kitchen2, HIGH);
	digitalWrite(light_kitchen3, HIGH);
	digitalWrite(light_kitchen4, HIGH);
	Serial.println("[Onome] Kitchen lights turned on!");
}

void onomeKitchenLightsOff() {
	digitalWrite(light_kitchen1, LOW);
	digitalWrite(light_kitchen2, LOW);
	digitalWrite(light_kitchen3, LOW);
	digitalWrite(light_kitchen4, LOW);
	Serial.println("[Onome] Kitchen lights turned off!");
}

void onomeBathroomLightOn() {
	digitalWrite(light_bathroom, HIGH);
	Serial.println("[Onome] Bathroom light turned on!");
}

void onomeBathroomLightOff() {
	digitalWrite(light_bathroom, LOW);
	Serial.println("[Onome] Bathroom light turned off!");
}

void onomeBedroomLightsOn() {
	digitalWrite(light_bedroom1, HIGH);
	digitalWrite(light_bedroom2, HIGH);
	digitalWrite(light_bedroom3, HIGH);
	digitalWrite(light_bedroom4, HIGH);
	digitalWrite(light_bedroom5, HIGH);
	Serial.println("[Onome] Bedroom lights turned on!");
}

void onomeBedroomLightsOff() {
	digitalWrite(light_bedroom1, LOW);
	digitalWrite(light_bedroom2, LOW);
	digitalWrite(light_bedroom3, LOW);
	digitalWrite(light_bedroom4, LOW);
	digitalWrite(light_bedroom5, LOW);
	Serial.println("[Onome] Bedroom lights turned off!");
}

void onomeGarageLightOn() {
	digitalWrite(light_garage, HIGH);
	Serial.println("[Onome] Garage light turned on!");
}

void onomeGarageLightOff() {
	digitalWrite(light_garage, LOW);
	Serial.println("[Onome] Garage light turned off!");
}

// Manage Onome HomeGate System

int hgate_status = 0;

void onomeHomeGateClose() {
	Serial.println("[HomeGate] Got close input! Processing...");
	delay(1000);
		Serial.println("[HomeGate] Warning: Closing gate... Please stay away from it!");
		for (angle = 1; angle < 90; angle += angleincrement) {
			OnomeHomeGate1.write(angle);
			delay(50);
		}
		delay(1000);
		hgate_status = 0;
		Serial.println("[HomeGate] Gate closed!");
}

void onomeHomeGateOpen() {
	Serial.println("[HomeGate] Got open input! Processing...");
	delay(1000);
		Serial.println("[HomeGate] Warning: Opening gate... Please stay away from it!");
		for (angle = 90; angle >= 1; angle -= angleincrement) {
			OnomeHomeGate1.write(angle);
			delay(50);
		}
		delay(1000);
		hgate_status = 1;
		Serial.println("[HomeGate] Gate opened!");
}

void onomeHomeGateError() {
	for (buzzer_error=0; buzzer_error<3; buzzer_error++) {
		tone(buzzer, 850, 100);
		delay(150);
		noTone(buzzer);
	}
}

void onomeHomeGateTrigger() {
	if (hgate_status == 0) {
		onomeHomeGateOpen();
	}
	else {
		onomeHomeGateClose();
	}
}

// RFID Tones

void onomeRFIDCheckInTone() {
		tone(buzzer,900,500);
	  delay(200);
	  noTone(buzzer);
	  tone(buzzer,1200,300);
	  delay(200);
	  noTone(buzzer);
	  delay(500);
	}

void onomeRFIDCheckErrorTone() {
    tone(buzzer,900,500);
    delay(200);
    noTone(buzzer);
    delay(100);
    tone(buzzer,900,500);
    delay(200);
    noTone(buzzer);
 }

void onomeRFIDCheckOutTone() {
	  tone(buzzer,1200,500);
	  delay(200);
	  noTone(buzzer);
	  tone(buzzer,900,300);
}

void onomeShutDownTone() {
		tone(buzzer, 750, 100);
		delay(500);
		noTone(buzzer);
}

	void onomeSIM900Trigger() {
		Serial.println("[Onome] Sending HIGH status to SIM900 module...");
		digitalWrite(sim900, HIGH);
		delay(1000);
		Serial.println("[Onome] HIGH status sent for 1500ms!");
		Serial.println("[Onome] Sending LOW status to SIM900 module...");
		digitalWrite(sim900, LOW);
		delay(1000);
		Serial.println("[Onome] Trigger done!");
	}

// Once we wrote the voids, we need to assign them to serial commands. When the user gives to the microcontroller an input command, it will output a void.
void loop() {
	if (Serial.available()) {
	// pi_command is the char that microcontroller will use to read inputs.
	pi_command = Serial.read();
	if (pi_command == 'A') {
		onomeAisleLightsOn(); // Turn Aisle lights on
	}
	if (pi_command == 'B') {
		onomeAisleLightsOff(); // Turn Aisle Lights off
	}
	if (pi_command == 'a') {
		onomeDHTSensorOn(); // Turn DHT Sensor ON
	}
	if (pi_command == 'b') {
		onomeDHTSensorOff(); // Turn DHT Sensor Off
	}
	if (pi_command == 'c') {
		onomeLightAutomationOn(); // Turn Auto lights On
	}
	if (pi_command == 'd') {
		onomeLightAutomationOff(); // Turn auto lights off
	}
	if (pi_command == 'e') {
		onomeLivingLightsOn(); // Turn living lights on
	}
	if (pi_command == 'f') {
		onomeLivingLightsOff(); // Turn living lights off
	}
	if (pi_command == 'g') {
		onomeKitchenLightsOn(); // Turn kitchen lights on
	}
	if (pi_command == 'h') {
		onomeKitchenLightsOff(); // Turn kitchen lights off
	}
	if (pi_command == 'i') {
		onomeBathroomLightOn(); // Turn bathroom light on
	}
	if (pi_command == 'j') {
		onomeBathroomLightOff(); // Turn bathroom light off
	}
	if (pi_command == 'k') {
		onomeBedroomLightsOn(); // Turn bedroom lights on
	}
	if (pi_command == 'l') {
		onomeBedroomLightsOff(); // Turn bedroom lights off
	}
	if (pi_command == 'm') {
		onomeGarageLightOn(); // Turn garage light on
	}
	if (pi_command == 'n') {
		onomeGarageLightOff(); // Turn garage light off
	}

	// Managing HomeGate
	if ((pi_command == 'o') && (hgate_status == 0)) {
		onomeHomeGateOpen(); // Open HomeGate
		return(0);
	}
	if ((pi_command == 'o') && (hgate_status == 1)) {
		onomeHomeGateError();
		return(0);
	}
	if ((pi_command == 'p') && (hgate_status == 1)) {
		onomeHomeGateClose(); // Close HomeGate
		return(0);
	}
	if ((pi_command == 'p') && (hgate_status == 0)) {
		onomeHomeGateError();
		return(0);
	}
	// This trigger is for RFID only at this time
	if (pi_command == 'q') {
		onomeHomeGateTrigger();
		return(0);
	}

	if (pi_command == 'R') {
		onomeRFIDCheckInTone();
	}
	if (pi_command == 'r') {
		onomeRFIDCheckErrorTone();
	}
	if (pi_command == 's') {
		onomeRFIDCheckOutTone();
	}
	if (pi_command == 'S') {
		onomeShutDownTone();
	}

	// Wake up the SIM900 Module
	if (pi_command == 'z') {
		onomeSIM900Trigger();
		return(0);
	}

	}
}
