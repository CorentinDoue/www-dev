import { Component, OnInit } from '@angular/core';
import {ROUTE_ANIMATIONS_ELEMENTS, routeAnimations} from '../../core/animations/route.animations';
import {ThemeHoursService} from '../../theme-hours.service';
import {PROJECTS} from '../../../data/projects.data';
import {ActivatedRoute, Router} from '@angular/router';

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
    public themeHoursService: ThemeHoursService,
    private route: ActivatedRoute,
    private router: Router,
  ) { }

  ngOnInit() {
    this.route.fragment.subscribe(fragment => {
      this.open(fragment);
    });
    this.initTheme();
  }

  private initTheme() {
    const hours = new Date().getHours();
    this.theme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
        ? 'blue-night-theme'
        : 'blue-day-theme'
    );
  }

  public open(id: string) {
    let found = false;
    for (let i = 0, len = this.projects.length; i < len; i++) {
      if (this.projects[i].id === id){
        this.projects[i].open = true;
        found = true;
      } else {
        this.projects[i].open = false;
      }
    }
    this.projects = [...this.projects];
    if (!found && id != null) {
      this.router.navigate(['/404']);
    }
  }


}
