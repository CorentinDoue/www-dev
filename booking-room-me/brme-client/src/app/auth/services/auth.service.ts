import { Injectable } from '@angular/core';
import { Observable, of, throwError } from 'rxjs';

import {Credentials, Session} from '../models/auth.model';
import {environment} from '../../../environments/environment';
import {HttpClient} from '@angular/common/http';

@Injectable()
export class AuthService {
  constructor(private http: HttpClient) {}

  check_session(session: Session): boolean {
    return session.exp > Date.now() / 1000;
  }

  login({ email, password, remember }: Credentials): Observable<Session> {

    const url = `${environment.upiUrl}/login`;
    return this.http.post<Session>(url, {email, password, remember});


    // return of({
    //   id: '1',
    //   firstName: 'Corentin',
    //   lastName: 'Doué',
    //   mail: 'corentin.doue@etu.emse.fr',
    //   token: 'token',
    //   exp: 5,
    //   role: 'ROLE_ADMIN'
    // });
  }

  logout() {
    return of(true);
  }
}
