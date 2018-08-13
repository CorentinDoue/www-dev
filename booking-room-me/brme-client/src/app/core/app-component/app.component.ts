import {Component, OnInit, ViewEncapsulation} from '@angular/core';
import {Observable, of} from 'rxjs';
import {select, Store} from '@ngrx/store';
import * as fromRoot from '../reducers/index';
import * as LayoutActions from '../actions/layout.actions';
import * as fromAuth from '../../auth/reducers';
import * as AuthActions from '../../auth/actions/auth.actions';
import {SESS_KEY} from '../../auth/actions/auth.actions';
import {LocalStorageService} from '../services/local-storage.service';
import {Session} from '../../auth/models/auth.model';

@Component({
  selector: 'brme-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
  encapsulation: ViewEncapsulation.None
})
export class AppComponent implements OnInit {
  navigation = [
    { link: 'room/cercle', label: 'Cercle'},
    { link: 'room/tennis', label: 'Tennis'},
    { link: 'room/bbq', label: 'Barbecues'},
    { link: 'room/piano', label: 'Piano'},
    { link: 'room/squash', label: 'Squash'},
    { link: 'room/city', label: 'City'},
    { link: 'room/2nme', label: 'Réunion 2 NME'},
  ];
  logo = '../../../../assets/logo_me.png';
  year = new Date().getFullYear();
  showSidenav$: Observable<boolean>;
  showUsernav$: Observable<boolean>;
  isAuthenticated$: Observable<boolean>;
  session$: Observable<Session>;
  isLoginPage: boolean;

  constructor(
    private store: Store<fromRoot.State>,
    private localStorageService: LocalStorageService,
  ) { }

  ngOnInit() {
    this.reloadSession();
    this.showSidenav$ = this.store.pipe(select(fromRoot.getShowSidenav));
    this.showUsernav$ = this.store.pipe(select(fromRoot.getShowUsernav));
    this.isAuthenticated$ = this.store.pipe(select(fromAuth.getLoggedIn));
    this.session$ = this.store.pipe(select(fromAuth.getSession));
    // this.session$.subscribe(session => { console.log(session); });
    this.store.pipe(select(fromRoot.getRouterState)).subscribe(router => {
      if (undefined !== router) {
        this.isLoginPage = router.state.url === '/login';
      } else {
        this.isLoginPage = false;
      }
    });
  }

  onLogoutClick() {
    this.store.dispatch(new AuthActions.Logout());
  }

  closeSidenav() {
    this.store.dispatch(new LayoutActions.CloseSidenav());
  }

  openSidenav() {
    this.store.dispatch(new LayoutActions.OpenSidenav());
  }

  openUsernav() {
    this.store.dispatch(new LayoutActions.OpenUsernav());
  }

  reloadSession() {
    const session: Session = this.localStorageService.getItem(SESS_KEY);
    if (session != null) {
      this.store.dispatch(new AuthActions.ReloadSession({session: session}));
    }
  }

}
