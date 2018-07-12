import { Component, OnInit } from '@angular/core';
import {ROUTE_ANIMATIONS_ELEMENTS, routeAnimations} from '../../core/animations/route.animations';
import {ThemeHoursService} from '../../theme-hours.service';

@Component({
  selector: 'spc-hobbies',
  templateUrl: './hobbies.component.html',
  styleUrls: ['./hobbies.component.scss'],
  animations: [routeAnimations]
})
export class HobbiesComponent implements OnInit {

  theme;
  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;

  constructor(
    public themeHoursService: ThemeHoursService
  ) { }

  ngOnInit() {
    this.initTheme();
  }

  private initTheme() {
    const hours = new Date().getHours();
    this.theme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
        ? 'blue-night-theme'
        : 'blue-day-theme'
    );
  }

}
