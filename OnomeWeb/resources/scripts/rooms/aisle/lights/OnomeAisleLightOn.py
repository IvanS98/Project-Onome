import serial
arduinoSerialData = serial.Serial('/dev/ttyACM0',9600)
arduinoSerialData.write('A')