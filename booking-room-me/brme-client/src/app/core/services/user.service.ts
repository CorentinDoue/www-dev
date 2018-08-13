import {Injectable} from '@angular/core';
import {HttpClient} from '../../../../node_modules/@angular/common/http';
import {User} from '../../settings/models/user.model';
import {environment} from '../../../environments/environment';
import {Session} from '../../auth/models/auth.model';
import {Observable} from 'rxjs';

@Injectable()
export class UserService {
  constructor (private http: HttpClient) {}

  public create (user: User): Observable<any> {
    console.log('! user service reached !');
    console.log(user);
    const url = `${environment.upiUrl}/users`;

    return this.http.post(url, user);

  }
}
