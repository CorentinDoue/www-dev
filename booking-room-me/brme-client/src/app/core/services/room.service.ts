import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {environment} from '../../../environments/environment';
import {Observable} from 'rxjs';
import {Room} from '../../bookings/models/room.model';

@Injectable()
export class RoomService {
  constructor (private http: HttpClient) {}

  public create(room: Room): Observable<Room> {
    const url = `${environment.upiUrl}/rooms`;
    return this.http.post<Room>(url, room);
  }

  public get(): Observable<Room[]> {
    console.log('service floor');
    const url = `${environment.upiUrl}/rooms`;
    return this.http.get<Room[]>(url);
  }

  public delete(id: number): Observable<any> {
    const url = `${environment.upiUrl}/rooms/${id}`;
    return this.http.delete(url);
  }

  public put (room: Room): Observable<Room> {
    const url = `${environment.upiUrl}/rooms/${room.id}`;
    return this.http.put<Room>(url, room);
  }
}
