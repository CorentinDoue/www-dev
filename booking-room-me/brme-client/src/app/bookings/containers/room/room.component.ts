import { Component, OnInit } from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {DateService} from '../../../core/services/date.service';
import {select, Store} from '@ngrx/store';
import * as fromBooking from '../../reducers';
import * as fromRoot from '../../../core/reducers';
import * as fromAuth from '../../../auth/reducers';
import {Observable} from 'rxjs';
import {Room} from '../../models/room.model';
import {Session} from '../../../auth/models/auth.model';
import {GetRoomReservations} from '../../actions/reservation.actions';
import {tap} from 'rxjs/operators';
import {CloseQuarter, OpenQuarter} from '../../actions/layer.actions';

@Component({
  selector: 'brme-room',
  templateUrl: './room.component.html',
  styleUrls: ['./room.component.scss']
})
export class RoomComponent implements OnInit {
  currentUser$: Observable<Session | null>;
  currentDate$: Observable<number | null>;
  currentRoom$: Observable<Room>;
  pending$: Observable<boolean>;
  error$: Observable<string>;
  days$: Observable<any>;
  init = -1;

  constructor(private dateService: DateService, private store: Store<fromRoot.State>) { }

  ngOnInit() {
    this.days$ = this.store.pipe(select(fromBooking.getDays));
    this.pending$ = this.store.pipe(select(fromBooking.selectPendingState));
    this.error$ = this.store.pipe(select(fromBooking.getReservationError));
    this.currentDate$ = this.store.pipe(select(fromBooking.getReservationCurrentDate));
    this.currentUser$ = this.store.pipe(select(fromAuth.getSession));
    this.currentRoom$ = this.store.pipe(select(fromRoot.getSelectedRoom),
      tap(currentRoom => {
        if (currentRoom !== undefined && this.init !== currentRoom.id) {
          this.store.dispatch(new GetRoomReservations({roomId: currentRoom.id}));
          this.init = currentRoom.id;
        }
      }));
  }

  switchQuarterState(quarter: number, day: number) {
    if (quarter === 0) {
      this.store.dispatch(new CloseQuarter({day: day}));
    } else {
      this.store.dispatch(new OpenQuarter({day: day, quarter: quarter}));
    }
  }
}
