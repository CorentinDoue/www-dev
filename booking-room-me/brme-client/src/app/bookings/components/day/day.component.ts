import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {Reservation} from '../../models/reservation.model';
import {animate, state, style, transition, trigger} from '@angular/animations';
import {Session} from '../../../auth/models/auth.model';
import {Room} from '../../models/room.model';
type slot = Array<{active: boolean, timestamps: number[]}>;

@Component({
  selector: 'brme-day',
  templateUrl: './day.component.html',
  styleUrls: ['./day.component.scss'],
  animations: [
    trigger('quarterState', [
      state('default', style({
        height: '25%',
        display: 'flex'
      })),
      state('open',   style({
        height: '100%',
        display: 'flex',
      })),
      state('close',   style({
        height: '0%',
        display: 'none'
      })),
      transition('default => open', animate('200ms ease-in')),
      transition('default => close', animate('200ms ease-in')),
      transition('open => default', animate('200ms ease-out')),
      transition('close => default', animate('200ms ease-out'))
    ])
  ]
})
export class DayComponent implements OnInit {
  date;
  quarters;
  resaUser;
  resa;
  @Input()
  set timestamp(time: number) {
    this.date = new Date(time * 1000);
    this.quarters = Array.from(new Array<{active: boolean, timestamps: number[]}>(4), (val, index) => {
      return {
        state: 'default',
        name: this.quartername(index),
        date: new Date((time + index * 12 * 30 * 60) * 1000),
        timestamps: Array.from(new Array(12), (val2, index2) => time + index * 12 * 30 * 60 + index2 * 30 * 60 )
      };
    });
  }
  @Input() currentUser: Session | null;
  @Input() currentRoom: Room | null;
  @Input()
  set reservations(reservations: Reservation[]) {
    this.resa = reservations;
    this.resaUser = 0;
    for (let i = 0; i < reservations.length; i++ ) {
      if ( this.currentUser !== null && reservations[i].user.id === this.currentUser.id ) {
        this.resaUser = this.resaUser + 1;
      }
    }
  }

  get reservations () {
    return this.resa;
  }

  @Input()
  set quartersState(index: number) {
    if (index === 0 ) {
      for (let i = 0; i < this.quarters.length; i++) {
        this.quarters[i].state = 'default';
      }
    } else {
      index = index - 1;
      for (let i = 0; i < this.quarters.length; i++) {
        if ( i === index ) {
          this.quarters[i].state = 'open';
        } else {
          this.quarters[i].state = 'close';
        }
      }
    }
  }
  @Output() switchQuarterState = new EventEmitter<number>();






  constructor() { }

  ngOnInit() {
  }

  reservation(timestamp: number): Reservation | null {
    for (let i = 0; i < this.reservations.length; i++ ) {
      if ( this.reservations[i].startTime === timestamp ) {
        return this.reservations[i];
      }
    }
    return null;
  }

  quartername(index: number): string {
    switch (index) {
      case 0:
        return 'Nuit';
      case 1:
        return 'Matin';
      case 2:
        return 'Après-Midi';
      case 3:
        return 'Soir';
    }
  }

  active(index: number) {
    this.switchQuarterState.emit(index + 1);
  }

  default() {
    this.switchQuarterState.emit(0);
  }

  newResa(type: boolean) {
    this.resaUser = type ? this.resaUser + 1 : this.resaUser - 1;
  }

}
