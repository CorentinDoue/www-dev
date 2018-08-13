import { Injectable } from '@angular/core';
import { HttpRequest, HttpHandler, HttpEvent, HttpInterceptor } from '@angular/common/http';
import { Observable } from 'rxjs';
import {select, Store} from '@ngrx/store';
import * as fromAuth from '../reducers';
import {first, flatMap} from 'rxjs/operators';


@Injectable()
export class JwtInterceptor implements HttpInterceptor {
    constructor(private store: Store<fromAuth.State>) {}

    intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {

      return this.store.pipe(select(fromAuth.getSession),
        first(),
        flatMap(session => {
          if (session && session.token) {
            request = request.clone({
              setHeaders: {
                Authorization: `Bearer ${session.token}`
              }
            });
          }
          return next.handle(request);
        }),
      );
    }
}
