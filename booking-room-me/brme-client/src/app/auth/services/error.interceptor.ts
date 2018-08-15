import { Injectable } from '@angular/core';
import { HttpRequest, HttpHandler, HttpEvent, HttpInterceptor } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

import {Store} from '@ngrx/store';
import * as fromAuth from '../reducers';
import * as authActions from '../actions/auth.actions';
import {Router} from '@angular/router';

@Injectable()
export class ErrorInterceptor implements HttpInterceptor {
    constructor(private store: Store<fromAuth.State>, private router: Router) {}

    intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
        return next.handle(request).pipe(catchError(err => {
            console.log(err);
            if (err.status === 401 && err.error.message.status !== '401 Bad Credential') {
                // auto logout if 401 response returned from api
                this.store.dispatch(new authActions.Logout());
                this.store.dispatch(new authActions.LoginFailure({error: 'Votre sessions n\'est plus valide, veuillez vous reconnecter'}));
                this.router.navigate(['/login']);
            }

            const error = err.error.message || err.error.violations[0].message || err.statusText;
            return throwError(error);
        }));
    }
}
