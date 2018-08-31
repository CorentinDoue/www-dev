import {Component, Input, OnInit} from '@angular/core';
import {Store} from '@ngrx/store';
import * as fromRoot from '../../../core/reducers';
import {SetDate} from '../../actions/reservation.actions';
import {Room} from '../../models/room.model';

@Component({
  selector: 'brme-date-picker',
  templateUrl: './date-picker.component.html',
  styleUrls: ['./date-picker.component.scss']
})
export class DatePickerComponent implements OnInit {
  date;
  @Input() currentRoom: Room | null;
  @Input()
  set timestamp(time: number | null) {
    if ( time === null ) {
      this.date = new Date();
    } else {
      this.date = new Date(time * 1000);
    }
  }
  constructor(private store: Store<fromRoot.State>) { }

  ngOnInit() {
  }

  next() {
    this.store.dispatch(new SetDate({timeStamp: Math.floor(this.date.getTime() / 1000) + 7 * 24 * 60 * 60, roomId: this.currentRoom.id}));
  }

  last() {
    this.store.dispatch(new SetDate({timeStamp: Math.floor(this.date.getTime() / 1000) - 7 * 24 * 60 * 60, roomId: this.currentRoom.id}));
  }

  set(value: Date) {
    this.store.dispatch(new SetDate({timeStamp: Math.floor(value.getTime() / 1000), roomId: this.currentRoom.id}));
  }

}
