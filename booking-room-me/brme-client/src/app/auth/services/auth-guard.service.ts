import { Injectable } from '@angular/core';
import {CanActivate, Router} from '@angular/router';
import { Store, select } from '@ngrx/store';
import { Observable } from 'rxjs';
import { map, take } from 'rxjs/operators';
import * as AuthActions from '../actions/auth.actions';
import * as fromAuth from '../reducers';

@Injectable()
export class AuthGuard implements CanActivate {
  constructor(private store: Store<fromAuth.State>) {}

  canActivate(): Observable<boolean> {
    return this.store.pipe(
      select(fromAuth.getLoggedIn),
      map(authed => {
        if (!authed) {
          this.store.dispatch(new AuthActions.LoginRedirect());
          return false;
        }

        return true;
      }),
      take(1)
    );
  }
}

@Injectable()
export class AdminGuard implements CanActivate {
  constructor(private store: Store<fromAuth.State>) {}

  canActivate(): Observable<boolean> {
    return this.store.pipe(
      select(fromAuth.getSession),
      map(session => {
        if (!session || session.role !== 'ROLE_ADMIN') {
          this.store.dispatch(new AuthActions.LoginRedirect());
          return false;
        }

        return true;
      }),
      take(1)
    );
  }
}

@Injectable()
export class LoginGuard implements CanActivate {
  constructor(private store: Store<fromAuth.State>, private router: Router) {}

  canActivate(): Observable<boolean> {
    return this.store.pipe(
      select(fromAuth.getLoggedIn),
      map(authed => {
        if (authed) {
          this.router.navigate(['/']);
          return false;
        }

        return true;
      }),
      take(1)
    );
  }
}
