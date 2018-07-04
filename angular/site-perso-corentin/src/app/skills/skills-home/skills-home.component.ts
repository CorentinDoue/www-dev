import { Component, OnInit } from '@angular/core';
import {ROUTE_ANIMATIONS_ELEMENTS, routeAnimations} from '../../core/animations/route.animations';
import {ThemeHoursService} from '../../theme-hours.service';
import {SKILLS} from '../../../data/skills.data';
import {ActivatedRoute, ParamMap, Router} from '@angular/router';
import {Observable} from 'rxjs';
import {switchMap} from 'rxjs/internal/operators';


@Component({
  selector: 'spc-skills-home',
  templateUrl: './skills-home.component.html',
  styleUrls: ['./skills-home.component.scss'],
  animations: [routeAnimations]
})
export class SkillsHomeComponent implements OnInit {

  theme;
  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;

  skills = SKILLS;
  skillType$: Observable<string>;

  constructor(
    public themeHoursService: ThemeHoursService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit() {
    this.skillType$ = this.route.paramMap.pipe(
      switchMap((params: ParamMap) => params.getAll('id'))
    );
    this.initTheme();
  }

  private initTheme() {
    const hours = new Date().getHours();
    this.theme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
        ? 'blue-night-theme'
        : 'blue-day-theme'
    );
  }

  goTo(skillType: string) {
    this.router.navigate(['/skills', skillType]);
  }
}

