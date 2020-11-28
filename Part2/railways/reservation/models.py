from django.db import models
from django.urls import reverse

# Create your models here.

Stations = {}

class Station(models.Model):
    station_ID = models.IntegerField(default=1)
    station_name  = models.CharField(max_length=256)

    def __str__(self):
        return self.station_name

class Mumbai_Train(models.Model):
    trainID = models.IntegerField()
    destination = models.ForeignKey(Station, on_delete=models.CASCADE)
    arrivalTime = models.DateTimeField()
    departureTime = models.DateTimeField()
    
class Hyderabad_Train(models.Model):
    trainID = models.IntegerField()
    destination = models.ForeignKey(Station, on_delete=models.CASCADE)
    arrivalTime = models.DateTimeField()
    departureTime = models.DateTimeField()

class Chennai_Train(models.Model):
    trainID = models.IntegerField()
    destination = models.ForeignKey(Station, on_delete=models.CASCADE)
    arrivalTime = models.DateTimeField()
    departureTime = models.DateTimeField()

class Bhopal_Train(models.Model):
    trainID = models.IntegerField()
    destination = models.ForeignKey(Station, on_delete=models.CASCADE)
    arrivalTime = models.DateTimeField()
    departureTime = models.DateTimeField()

class Delhi_Train(models.Model):
    trainID = models.IntegerField()
    destination = models.ForeignKey(Station, on_delete=models.CASCADE)
    arrivalTime = models.DateTimeField()
    departureTime = models.DateTimeField()