import {Injectable} from '@angular/core';
import {HttpClient, HttpParams} from '../../../../node_modules/@angular/common/http';
import {User} from '../../settings/models/user.model';
import {environment} from '../../../environments/environment';
import {Session} from '../../auth/models/auth.model';
import {Observable} from 'rxjs';
import {catchError, map} from 'rxjs/operators';
import {Sort} from '@angular/material';

@Injectable()
export class UserService {
  constructor (private http: HttpClient) {}

  public create (user: User): Observable<any> {
    // console.log('! user service reached !');
    // console.log(user);
    const url = `${environment.upiUrl}/users`;

    return this.http.post(url, user);
  }

  public search(query: string, sort: Sort | null = null, page: number = 0): Observable<any> {
    console.log('service floor');
    const url = `${environment.upiUrl}/users`;
    let Params = new HttpParams();

    if (query !== '') {
      Params = Params.append('search', query);
    }

    if (sort !== null) {
      Params = Params.append('order[' + sort.active + ']', sort.direction);
    }

    if (page > 0) {
      Params = Params.append('page', page.toString());
    }
    return this.http.get(url, {params: Params});
  }

  public delete(id: number): Observable<any> {
    const url = `${environment.upiUrl}/users/${id}`;
    return this.http.delete(url);
  }

  public put (user: User): Observable<any> {
    // console.log('! user service reached !');
    // console.log(user);
    const url = `${environment.upiUrl}/users/${user.id}`;

    return this.http.put(url, user);
  }
}
