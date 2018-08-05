import {Component, HostBinding, OnInit} from '@angular/core';
import {routeAnimations} from './core/animations/route.animations';
import { OverlayContainer } from '@angular/cdk/overlay';
import {DomSanitizer} from '@angular/platform-browser';
import browser from 'browser-detect';
import {AnimationsService} from './core/animations/animations.service';
import {ThemeHoursService} from './theme-hours.service';
import {MatIconRegistry} from '@angular/material/icon';



@Component({
  selector: 'spc-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
  animations: [routeAnimations]
})

export class AppComponent implements OnInit {

  @HostBinding('class') componentCssClass;

  year = new Date().getFullYear();

  navigation = [
    { link: 'about', label: 'About'},
    { link: 'cv', label: 'Curriculum vitae'},
    { link: 'skills', label: 'Skills'},
    { link: 'projects', label: 'Projects'},
    { link: 'hobbies', label: 'Hobbies'}
  ];

  constructor(
    public overlayContainer: OverlayContainer,
    private animationService: AnimationsService,
    public themeHoursService: ThemeHoursService,
    public iconReg: MatIconRegistry,
    public sanitizer: DomSanitizer
  ) {}
  private static isIEorEdge() {
    return ['ie', 'edge', 'ios', 'safari'].includes(browser().name);
  }

  private static isMobile() {
    return browser().mobile;
  }

  getState(outlet) {
    return outlet.activatedRouteData.state;
  }

  ngOnInit(): void {
    this.initTheme();
    if (AppComponent.isIEorEdge() || AppComponent.isMobile()) {
      this.animationService.updateRouteAnimationType(false, true);
    }
    this.initIcon();
  }

  private initTheme() {
    const hours = new Date().getHours();
    const effectiveTheme = ((hours >= this.themeHoursService.sunset || hours <= this.themeHoursService.sunrise)
        ? 'night-theme'
        : 'day-theme'
    );
    this.componentCssClass = effectiveTheme;
    const classList = this.overlayContainer.getContainerElement().classList;
    const toRemove = Array.from(classList).filter((item: string) =>
      item.includes('-theme')
    );
    if (toRemove.length) {
      classList.remove(...toRemove);
    }
    classList.add(effectiveTheme);
  }

  initIcon() {
    this.iconReg.addSvgIcon('advanced', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/progress-bar/advanced.svg'))
      .addSvgIcon('code', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/programming-language.svg'))
      .addSvgIcon('web', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/web.svg'))
      .addSvgIcon('ai', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/brain.svg'))
      .addSvgIcon('paint', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/paint.svg'))
      .addSvgIcon('tech', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/technology.svg'))
      .addSvgIcon('arrow', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/arrow.svg'))
      .addSvgIcon('running', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/running.svg'))
      .addSvgIcon('climbing', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/climbing.svg'))
      .addSvgIcon('skiing', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/skiing.svg'))
      .addSvgIcon('cooking', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/cooking.svg'))
      .addSvgIcon('crafting', this.sanitizer.bypassSecurityTrustResourceUrl('../assets/technology.svg'));
  }
}
