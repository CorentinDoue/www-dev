import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {ROUTE_ANIMATIONS_ELEMENTS, routeAnimations} from '../../core/animations/route.animations';
import {ThemeHoursService} from '../../theme-hours.service';
import {ActivatedRoute, Router} from '@angular/router';
import {HOBBIES} from '../../../data/hobbies.data';
import {Hobby} from '../../../data/hobby';

@Component({
  selector: 'spc-hobbies',
  templateUrl: './hobbies.component.html',
  styleUrls: ['./hobbies.component.scss'],
  animations: [routeAnimations]
})
export class HobbiesComponent implements OnInit {
  @ViewChild('top') top: ElementRef;
  SWIPE_ACTION = { LEFT: 'swipeleft', RIGHT: 'swiperight' };

  theme;
  routeAnimationsElements = ROUTE_ANIMATIONS_ELEMENTS;

  selectedHobby;
  hobbies: Hobby[] = HOBBIES;

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
      this.selectedHobby = this.selectedNumber(params.get('id'));
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
      case ('running'): { return 0; }
      case ('climbing'): { return 1; }
      case ('skiing'): { return 2; }
      case ('cooking'): { return 3; }
      case ('crafting'): { return 4; }
      default: { return 0; }
    }
  }

  selectedType(selectedNumber: number): string {
    switch (selectedNumber) {
      case (0): { return 'running'; }
      case (1): { return 'climbing'; }
      case (2): { return 'skiing'; }
      case (3): { return 'cooking'; }
      case (4): { return 'crafting'; }
      default: { return 'running'; }
    }
  }

  goTo(skillType: string) {
    this.router.navigate(['/hobbies', skillType]);
  }

  swipe(event) {

    if (event.type === this.SWIPE_ACTION.LEFT) {
      const isLast = this.selectedHobby + 1 === 5;
      this.goTo(this.selectedType(isLast ? 0 : this.selectedHobby + 1));
      // this.selectedSkill = isLast ? 4 : this.selectedSkill + 1;
    }

    if (event.type === this.SWIPE_ACTION.RIGHT) {
      const isFirst = this.selectedHobby - 1 === -1;
      this.goTo(this.selectedType(isFirst ? 4 : this.selectedHobby - 1));
      // this.selectedSkill = isFirst ? 0 : this.selectedSkill - 1;
    }
  }

  imgIndex(id: string) {
    return Number(id.split('-')[1]);
  }
}
