import {Component, OnDestroy, OnInit} from '@angular/core';
import {routeAnimations} from './core/animations/route.animations';
import {Title} from '@angular/platform-browser';
import {ActivationEnd, NavigationEnd, Router} from '@angular/router';
import {Subject} from 'rxjs';
import {filter, takeUntil} from 'rxjs/internal/operators';

@Component({
  selector: 'spc-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
  animations: [routeAnimations]
})

export class AppComponent implements OnInit, OnDestroy {
  private unsubscribe$: Subject<void> = new Subject<void>();

  year = new Date().getFullYear();
  logo = '../assets/logo.png';
  navigation = [
    { link: 'home', label: 'Home' },
    { link: 'cv', label: 'Curriculum vitae' },
    { link: 'skills', label: 'Skills' },
    { link: 'projects', label: 'Projects' },
    { link: 'bio', label: 'Biography' },
    { link: 'hobbies', label: 'Hobbies' }
  ];

  constructor(
    private router: Router,
    private titleService: Title
  ) {}

  // private static trackPageView(event: NavigationEnd) {
  //   (<any>window).ga('set', 'page', event.urlAfterRedirects);
  //   (<any>window).ga('send', 'pageview');
  // }

  ngOnInit(): void {
    //  this.subscribeToRouterEvents();
  }

  ngOnDestroy(): void {
    this.unsubscribe$.next();
    this.unsubscribe$.complete();
  }

  // private subscribeToRouterEvents() {
  //   this.router.events
  //     .pipe(
  //       filter(
  //         event =>
  //           event instanceof ActivationEnd || event instanceof NavigationEnd
  //       ),
  //       takeUntil(this.unsubscribe$)
  //     )
  //     .subscribe(event => {
  //       if (event instanceof ActivationEnd) {
  //         this.setPageTitle(event);
  //       }
  //
  //       if (event instanceof NavigationEnd) {
  //         AppComponent.trackPageView(event);
  //       }
  //     });
  // }
  //
  // private setPageTitle(event: ActivationEnd) {
  //   let lastChild = event.snapshot;
  //   while (lastChild.children.length) {
  //     lastChild = lastChild.children[0];
  //   }
  //   const { title } = lastChild.data;
  //   this.titleService.setTitle(
  //     title ? `${title} - Corentin Doué` : 'Corentin Doué'
  //   );
  // }
}
