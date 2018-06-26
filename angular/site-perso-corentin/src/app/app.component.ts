import {Component, HostBinding, OnDestroy, OnInit} from '@angular/core';
import {routeAnimations} from './core/animations/route.animations';
import { OverlayContainer } from '@angular/cdk/overlay';
import {Title} from '@angular/platform-browser';
import {ActivationEnd, NavigationEnd, Router} from '@angular/router';
import {Subject} from 'rxjs';
import {filter, takeUntil} from 'rxjs/internal/operators';
import browser from 'browser-detect';
import {AnimationsService} from './core/animations/animations.service';
import {ThemeHoursService} from './theme-hours.service';


@Component({
  selector: 'spc-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
  animations: [routeAnimations]
})

export class AppComponent implements OnInit{

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
    public themeHoursService: ThemeHoursService
  ) {}
  private static isIEorEdge() {
    return ['ie', 'edge'].includes(browser().name);
  }

  ngOnInit(): void {
    this.initTheme();
    if (AppComponent.isIEorEdge()) {
      this.animationService.updateRouteAnimationType(false, true);
    }
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

  getState(outlet) {
    return outlet.activatedRouteData.state;
  }


}
