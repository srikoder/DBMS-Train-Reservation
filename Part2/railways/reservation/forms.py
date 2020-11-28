from django import forms
from reservation import models
from django.core.exceptions import ValidationError

class SearchForm(forms.Form):
    source = forms.ModelChoiceField(queryset=models.Station.objects.all())
    destination = forms.ModelChoiceField(queryset=models.Station.objects.all())
    def validation(self):
        if self.source == self.destination:
            raise ValidationError("Source and Destination cannot be same!")


