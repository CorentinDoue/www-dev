import { Injectable } from '@angular/core';
import { Actions, Effect, ofType } from '@ngrx/effects';
import {of} from 'rxjs';
import {catchError, exhaustMap, map} from 'rxjs/operators';

import {
  CreateRoom,
  CreateRoomSuccess, DeleteRoom, RoomFailure, DeleteRoomSuccess, PutRoom, PutRoomSuccess,
  RoomAdminSettingsActionTypes, GetRoom, GetRoomSuccess
} from '../actions/rooms.actions';
import {RoomService} from '../../core/services/room.service';
import {Room} from '../../bookings/models/room.model';
import {User} from '../models/user.model';
import {JsonLdService} from '../../core/services/json-ld.service';


@Injectable()
export class RoomAdminSettingsEffects {

  @Effect()
  createroom$ = this.actions$.pipe(
    ofType<CreateRoom>(RoomAdminSettingsActionTypes.CreateRoom),
    map(action => action.payload),
    exhaustMap((room: Room) =>
      this.roomService.create(room).pipe(
        map(newroom => new CreateRoomSuccess({message: 'Salle créée avec succès', room: newroom})),
        catchError(error => of(new RoomFailure(error)))
      )
    )
  );

  @Effect()
  deleteroom$ = this.actions$.pipe(
    ofType<DeleteRoom>(RoomAdminSettingsActionTypes.DeleteRoom),
    map(action => action.payload),
    exhaustMap((id: number) =>
      this.roomService.delete(id).pipe(
        map(sucess => new DeleteRoomSuccess({message: 'Salle supprimée avec succès', id: id})),
        catchError(error => of(new RoomFailure(error)))
      )
    )
  );

  @Effect()
  putroom$ = this.actions$.pipe(
    ofType<PutRoom>(RoomAdminSettingsActionTypes.PutRoom),
    map(action => action.payload),
    exhaustMap((room: Room) =>
      this.roomService.put(room).pipe(
        map(room2 => new PutRoomSuccess({message: 'Salle modifiée avec succès', room: room2})),
        catchError(error => of(new RoomFailure(error)))
      )
    )
  );

  @Effect()
  getrooms$ = this.actions$.pipe(
    ofType<GetRoom>(RoomAdminSettingsActionTypes.GetRoom),
    exhaustMap(() =>
      this.roomService.get().pipe(
        map(response => this.jsonLdService.parseCollection<Room>(response)),
        map(rooms => new GetRoomSuccess({message: '', rooms: rooms})),
        catchError(error => of(new RoomFailure(error)))
      )
    )
  );


  constructor(
    private actions$: Actions,
    private roomService: RoomService,
    private jsonLdService: JsonLdService
  ) {}
}
