# Generated by Django 2.2.5 on 2020-11-26 19:26

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('reservation', '0002_auto_20201126_1919'),
    ]

    operations = [
        migrations.CreateModel(
            name='Train',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('trainID', models.IntegerField()),
                ('arrivalTime', models.DateTimeField()),
                ('departureTime', models.DateTimeField()),
                ('destination', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='reservation.Station')),
                ('station', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, related_name='begin', to='reservation.Station')),
            ],
        ),
    ]
