import { Injectable } from '@angular/core';
import {ActivatedRoute, CanActivate, Router} from '@angular/router';
import {strIdToTabId} from '../models/settings.models';
import {select, Store} from '@ngrx/store';
import * as fromRoot from '../../core/reducers';
import {Observable} from 'rxjs';
import * as fromAuth from '../../auth/reducers';
import {map, take} from 'rxjs/operators';
import * as AuthActions from '../../auth/actions/auth.actions';

@Injectable()
export class AdminSettingsGuard implements CanActivate {
  constructor(private store: Store<fromRoot.State>, private router: Router) {}

  canActivate(): Observable<boolean> {
    return this.store.pipe(
      select(fromRoot.getUrlState),
      map(url => {
        const parsedUrl = url.url.toString().split('/');
        if ( parsedUrl.length === 3 ) {
          return true;
        } else if ( parsedUrl.length === 4 && strIdToTabId(parsedUrl[3].toString()) !== -1 ) {
          return true;
        } else {
          this.router.navigate(['/404']);
          return false;
        }
      }),
      take(1)
    );
  }

  // canActivate(): boolean {
  //   // console.log(this.route.snapshot.url[3].toString());
  //   if ( this.route.snapshot.url.length === 3 ) {
  //     return true;
  //   } else if ( this.route.snapshot.url.length === 4 && strIdToTabId(this.route.snapshot.url[3].toString()) !== -1 ) {
  //     return true;
  //   } else {
  //     console.log(this.route.snapshot.url);
  //     console.log(this.route.snapshot.url.toString());
  //     this.router.navigate(['/404']);
  //     return false;
  //   }
  // }
}
