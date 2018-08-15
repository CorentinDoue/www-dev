import { Component, OnInit } from '@angular/core';
import {select, Store} from '@ngrx/store';
import * as fromSettings from '../reducers/index';
import {CreateRoom} from '../actions/rooms.actions';

@Component({
  selector: 'brme-room-new',
  template: `<brme-room-form (submitted)="onSubmit($event)"
                             [pending]="ispending$ | async"
                             [errorMessage]="errorMessage$ | async"
                             [successMessage]="successMessage$ | async"
                             verb="Créer">
              </brme-room-form>`,
  styles: []
})
export class RoomNewComponent implements OnInit {

  errorMessage$ = this.store.pipe(select(fromSettings.getRoomFormError));
  successMessage$ = this.store.pipe(select(fromSettings.getRoomFormSuccess));
  ispending$ = this.store.pipe(select(fromSettings.getRoomFormPending));

  constructor(private store: Store<fromSettings.State>) { }

  ngOnInit() {}

  onSubmit(event) {
    this.store.dispatch(new CreateRoom(event));
  }

}
