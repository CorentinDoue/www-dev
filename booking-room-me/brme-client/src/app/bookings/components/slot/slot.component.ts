import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {Reservation} from '../../models/reservation.model';
import {User} from '../../../settings/models/user.model';
import {Session} from '../../../auth/models/auth.model';
import {Room} from '../../models/room.model';
import {Store} from '@ngrx/store';
import * as fromRoot from '../../../core/reducers';
import {DeleteRoomReservation, PostRoomReservation} from '../../actions/reservation.actions';

@Component({
  selector: 'brme-slot',
  templateUrl: './slot.component.html',
  styleUrls: ['./slot.component.scss']
})
export class SlotComponent implements OnInit {
  date;
  time;
  pending = false;
  @Input() resaUser: number;

  @Input()
  set timestamp(time: number) {
    this.date = new Date(time * 1000);
    this.time = time;
  }
  get timestamp() { return this.time; }
  @Input() currentUser: Session | null;
  @Input() currentRoom: Room | null;
  @Input() reservation: Reservation | null;
  @Input() active: boolean;
  @Output() newResa = new EventEmitter<boolean>();

  constructor(private store: Store<fromRoot.State>) { }

  ngOnInit() {
  }

  book() {
    this.store.dispatch(new PostRoomReservation({userId: this.currentUser.id, roomId: this.currentRoom.id, startTime: this.timestamp}));
    this.pending = true;
    this.newResa.emit(true);
  }

  unbook() {
    this.store.dispatch(new DeleteRoomReservation(this.reservation.id));
    this.pending = true;
    this.newResa.emit(false);
  }

  class(): string {
    if ( this.reservation === null) {
      return 'default';
    } else if ( this.currentUser !== null && this.reservation.user.id === this.currentUser.id) {
      return 'booked-current-user';
    } else {
      switch (this.reservation.user.role) {
        case 'ROLE_ASSO':
          return 'booked-asso';
        case 'ROLE_ADMIN':
          return 'booked-admin';
        default:
          return 'booked-other';
      }
    }
  }

}
