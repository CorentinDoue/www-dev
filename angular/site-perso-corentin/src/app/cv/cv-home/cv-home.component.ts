import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {ROUTE_ANIMATIONS_ELEMENTS, routeAnimations} from '../../core/animations/route.animations';
import {ThemeHoursService} from '../../theme-hours.service';

@Component({
  selector: 'spc-cv-home',
  templateUrl: './cv-home.component.html',
  styleUrls: ['./cv-home.component.scss'],
  animations: [routeAnimations]
})
export class CvHomeComponent implements OnInit {
  @ViewChild('top') top: ElementRef;
  theme;
  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;

  constructor(
    public themeHoursService: ThemeHoursService
  ) { }

  ngOnInit() {
    this.top.nativeElement.scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
    this.initTheme();
  }

  private initTheme() {
    const hours = new Date().getHours();
    const effectiveTheme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
        ? 'blue-night-theme'
        : 'blue-day-theme'
    );
    this.theme = effectiveTheme;
  }
}
