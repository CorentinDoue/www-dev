import {Injectable} from '@angular/core';
import {Actions, Effect, ofType} from '@ngrx/effects';

import {catchError, exhaustMap, map, subscribeOn, take, tap} from 'rxjs/operators';
import {Room} from '../../bookings/models/room.model';
import {of} from 'rxjs';
import {RoomService} from '../services/room.service';
import {JsonLdService} from '../services/json-ld.service';
import {Failure, GetRoom, GetRoomSuccess, LayoutActionTypes} from '../actions/layout.actions';
import {RouterNavigationAction} from '@ngrx/router-store';
import {Router} from '@angular/router';



@Injectable()
export class LayoutEffects {
  @Effect()
  getrooms$ = this.actions$.pipe(
    ofType<GetRoom>(LayoutActionTypes.GetRoom),
    exhaustMap(() =>
      this.roomService.get().pipe(
        map(response => this.jsonLdService.parseCollection<Room>(response)),
        map(rooms => new GetRoomSuccess({message: '', rooms: rooms})),
        catchError(error => of(new Failure(error)))
      )
    )
  );

  @Effect()
  getroomssucess$ = this.actions$.pipe(
    ofType<GetRoomSuccess>(LayoutActionTypes.GetRoomSuccess),
    take(1),
    tap(() => this.router.navigate([]))
  )

  constructor(
    private actions$: Actions,
    private roomService: RoomService,
    private jsonLdService: JsonLdService,
    private router: Router
  ) {}
}
