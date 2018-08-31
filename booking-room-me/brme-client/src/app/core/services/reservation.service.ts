import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {environment} from '../../../environments/environment';
import {Observable} from 'rxjs';
import {Reservation, ReservationDTO} from '../../bookings/models/reservation.model';

@Injectable()
export class ReservationService {
  constructor (private http: HttpClient) {}

  public create(reservation: ReservationDTO): Observable<Reservation> {
    const url = `${environment.upiUrl}/reservations`;
    // console.log(reservation);
    const body = {
      user: `${environment.apiId}/users/${reservation.userId}`,
      room: `${environment.apiId}/rooms/${reservation.roomId}`,
      startTime: reservation.startTime
    };
    return this.http.post<Reservation>(url, body);
  }

  public get(roomId: number, timestamp: number | null): Observable<Reservation[]> {
    let url;
    if (timestamp != null) {
      url = `${environment.upiUrl}/reservations?room.id=${roomId}&time=${timestamp}`;
    } else {
      url = `${environment.upiUrl}/reservations?room.id=${roomId}&time=now`;
    }
    return this.http.get<Reservation[]>(url);
  }

  public delete(id: number): Observable<Reservation> {
    const url = `${environment.upiUrl}/reservations/${id}`;
    return this.http.delete<Reservation>(url);
  }
}
