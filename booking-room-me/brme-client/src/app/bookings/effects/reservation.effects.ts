import {Injectable} from '@angular/core';
import {Actions, Effect, ofType} from '@ngrx/effects';

import {catchError, debounceTime, exhaustMap, map, mergeMap, skip, switchMap, take, takeUntil, tap} from 'rxjs/operators';
import {asyncScheduler, Observable, of} from 'rxjs';
import {
  DeleteRoomReservation, DeleteRoomReservationSuccess,
  GetRoomReservations,
  GetRoomReservationsSuccess, PostRoomReservation, PostRoomReservationSuccess,
  ReservationActionTypes, RoomReservationsFailure, SetDate
} from '../actions/reservation.actions';
import {Action, select, Store} from '@ngrx/store';
import {ReservationService} from '../../core/services/reservation.service';
import * as fromBooking from '../reducers';
import {Reservation, ReservationDTO} from '../models/reservation.model';
import {JsonLdService} from '../../core/services/json-ld.service';
import {Room} from '../models/room.model';




@Injectable()
export class ReservationEffects {
  @Effect()
  postroomreservations$ = this.actions$.pipe(
    ofType<PostRoomReservation>(ReservationActionTypes.PostRoomReservation),
    map(action => action.payload),
    mergeMap((reservationDto: ReservationDTO) =>
      this.reservationService.create(reservationDto).pipe(
        map((reservation: Reservation) => new PostRoomReservationSuccess(reservation)),
        catchError(error => of(new RoomReservationsFailure(error)))
      )
    )
  );

  @Effect()
  deleteroomreservations$ = this.actions$.pipe(
    ofType<DeleteRoomReservation>(ReservationActionTypes.DeleteRoomReservation),
    map(action => action.payload),
    mergeMap((id: number) =>
      this.reservationService.delete(id).pipe(
        map((reservation: Reservation) => new DeleteRoomReservationSuccess(id)),
        catchError(error => of(new RoomReservationsFailure(error)))
      )
    )
  );

  @Effect()
  setdate$ = this.actions$.pipe(
    ofType<SetDate>(ReservationActionTypes.SetDate),
    map(action => new GetRoomReservations({roomId: action.payload.roomId})),
  );

  @Effect()
  getroomreservations$ = ({ debounce = 300, scheduler = asyncScheduler } = {}): Observable<Action> =>
    this.actions$.pipe(
      ofType<GetRoomReservations>(ReservationActionTypes.GetRoomReservations),
      debounceTime(debounce, scheduler),
      map(action => action.payload.roomId),
      switchMap(roomId => {
        const nextSearch$ = this.actions$.pipe(
          ofType(ReservationActionTypes.GetRoomReservations),
          skip(1)
        );
        return this.store.pipe(
          select(fromBooking.getReservationCurrentDate),
          takeUntil(nextSearch$),
          take(1),
          switchMap(timestamp => {
            return this.reservationService.get(roomId, timestamp).pipe(
              takeUntil(nextSearch$),
              map(response => this.jsonLdService.parseCollection<Reservation>(response)),
              map((response) => new GetRoomReservationsSuccess(response)),
              catchError(err => of(new RoomReservationsFailure(err)))
            );
          })
        );
      })
    )





  constructor(
    private actions$: Actions,
    private reservationService: ReservationService,
    private store: Store<fromBooking.State>,
    private jsonLdService: JsonLdService
  ) {}
}
