from django.shortcuts import render
from django.views import generic
from django.views.generic.edit import FormView
from django.views.generic import ListView
from reservation import forms
from reservation import models
from django.db.models.functions import datetime
from django.utils.timezone import make_aware
# Create your views here.

def trains_from_to(source, destination, time):
    search_model = None
    if(str(source) == "Mumbai" ):
        search_model = models.Mumbai_Train
    if(str(source) == "Delhi"):
        search_model = models.Delhi_Train
    if(str(source) == "Chennai"):
        search_model = models.Chennai_Train
    if(str(source) == "Bhopal"):
        search_model = models.Bhopal_Train
    if(str(source) == "Hyderabad"):
        search_model = models.Hyderabad_Train

    return search_model.objects.filter(destination = destination, departureTime__gt = time)

class user_view(FormView):
    form_class = forms.SearchForm
    template_name = 'reservation/main.html'

    def form_valid(self, *args, **kwargs):
        pass

def search_result(request):
    queryset_dict = {}
    MyForm = forms.SearchForm(request.POST)
    if MyForm.is_valid():
        source = MyForm.cleaned_data['source']
        destination = MyForm.cleaned_data['destination']

        stations = models.Station.objects.all()
        queryset_direct = trains_from_to(source, destination, make_aware(datetime.datetime.now()))
        queryset_dict = {}
        queryset_dict['direct'] = queryset_direct

        for station in stations:
            if station == source or station == destination:
                continue
            
            queryset_temp = trains_from_to(source, station, make_aware(datetime.datetime.now()) )
            for train in queryset_temp:
                q = trains_from_to(station, destination, train.arrivalTime)
                if q:
                    queryset_dict[str(station)] = {}
                    queryset_dict[str(station)][train] = q 
    print(queryset_dict)
    return render(request, 'reservation/results.html', context=queryset_dict)


