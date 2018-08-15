import { Component, OnInit } from '@angular/core';
import {select, Store} from '@ngrx/store';
import * as fromSettings from '../reducers';
import {DeleteRoom, GetRoom, PutRoom, SelectRoom} from '../actions/rooms.actions';
import {Room} from '../../bookings/models/room.model';


@Component({
  selector: 'brme-room-management',
  template: `
    <brme-search [searching]="loading$ | async"
                 [error]="error$ | async"
                 [success]="success$ | async"
                 (search)="search($event)"
                 title="Salles" placeholder="Rechercher une salle">
    </brme-search>
    <brme-room-form *ngIf="selectedRoom$ | async"
                    (submitted)="onSubmit($event)"
                    [pending]="ispending$ | async"
                    [errorMessage]="errorMessage$ | async"
                    [successMessage]="successMessage$ | async"
                    [room]="selectedRoom$ | async"
                    [isNew]="false"
                    verb="Modifier">
    </brme-room-form>
    <brme-rooms-list [rooms]="rooms$ | async"
                       (deleted)="delete($event)"
                       (selected)="select($event)" [filter]="filter">
    </brme-rooms-list>
  `,
  styles: []
})
export class RoomManagementComponent implements OnInit {
  errorMessage$ = this.store.pipe(select(fromSettings.getRoomFormError));
  successMessage$ = this.store.pipe(select(fromSettings.getRoomFormSuccess));
  ispending$ = this.store.pipe(select(fromSettings.getRoomFormPending));
  selectedRoom$ = this.store.pipe(select(fromSettings.getSelectedRoom));
  rooms$ = this.store.pipe(select(fromSettings.getAllRooms));
  loading$ = this.store.pipe(select(fromSettings.getRoomSearchLoading));
  error$ = this.store.pipe(select(fromSettings.getRoomSearchError));
  success$ = this.store.pipe(select(fromSettings.getRoomSearchSuccess));
  filter: string;

  constructor(private store: Store<fromSettings.State>) {}

  delete(id) {
    this.store.dispatch(new DeleteRoom(id));
  }

  select(id) {
    this.store.dispatch(new SelectRoom(id));
  }

  ngOnInit(): void {
    this.store.dispatch(new GetRoom(null));
  }

  onSubmit(room: Room) {
    this.store.dispatch(new PutRoom(room));
  }

  search (event) {
    this.filter = event;
  }
}
