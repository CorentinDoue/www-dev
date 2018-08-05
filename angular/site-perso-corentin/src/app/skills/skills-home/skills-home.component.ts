import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {ROUTE_ANIMATIONS_ELEMENTS, routeAnimations} from '../../core/animations/route.animations';
import {ThemeHoursService} from '../../theme-hours.service';
import {SKILLS} from '../../../data/skills.data';
import {ActivatedRoute, Router} from '@angular/router';

@Component({
  selector: 'spc-skills-home',
  templateUrl: './skills-home.component.html',
  styleUrls: ['./skills-home.component.scss'],
  animations: [routeAnimations]
})
export class SkillsHomeComponent implements OnInit {
  @ViewChild('top') top: ElementRef;
  SWIPE_ACTION = { LEFT: 'swipeleft', RIGHT: 'swiperight' };
  theme;
  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;
  skills = SKILLS;
  selectedSkill;

  constructor(
    public themeHoursService: ThemeHoursService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit() {
    this.top.nativeElement.scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
    this.route.paramMap.subscribe(params => {
      this.selectedSkill = this.selectedNumber(params.get('id'));
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

  selectedNumber(selectedType: string): number {
    switch (selectedType) {
      case ('languages'): { return 0; }
      case ('web'): { return 1; }
      case ('ai'): { return 2; }
      case ('graphical'): { return 3; }
      case ('other'): { return 4; }
      default: { return 0; }
    }
  }

  selectedType(selectedNumber: number): string {
    switch (selectedNumber) {
      case (0): { return 'languages'; }
      case (1): { return 'web'; }
      case (2): { return 'ai'; }
      case (3): { return 'graphical'; }
      case (4): { return 'other'; }
      default: { return 'languages'; }
    }
  }

  goTo(skillType: string) {
    this.router.navigate(['/skills', skillType]);
  }

  swipe(event) {

    if (event.type === this.SWIPE_ACTION.LEFT) {
      const isLast = this.selectedSkill + 1 === 5;
      this.goTo(this.selectedType(isLast ? 0 : this.selectedSkill + 1));
      // this.selectedSkill = isLast ? 4 : this.selectedSkill + 1;
    }

    if (event.type === this.SWIPE_ACTION.RIGHT) {
      const isFirst = this.selectedSkill - 1 === -1;
      this.goTo(this.selectedType(isFirst ? 4 : this.selectedSkill - 1));
      // this.selectedSkill = isFirst ? 0 : this.selectedSkill - 1;
    }
  }

}

