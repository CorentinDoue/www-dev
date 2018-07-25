import { Component, OnInit } from '@angular/core';
import {ROUTE_ANIMATIONS_ELEMENTS, routeAnimations} from '../../core/animations/route.animations';
import {ThemeHoursService} from '../../theme-hours.service';
import {PROJECTS} from '../../../data/projects.data';

@Component({
  selector: 'spc-projects-home',
  templateUrl: './projects-home.component.html',
  styleUrls: ['./projects-home.component.scss'],
  animations: [routeAnimations]
})
export class ProjectsHomeComponent implements OnInit {

  theme;
  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;
  projects = PROJECTS;

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

  public onOpened(opened: boolean, index: number){
    for (let i = 0, len = this.projects.length; i < len; i++) {
      this.projects[i].open = i === index;
    }
    this.projects = [...this.projects];
  }
}
