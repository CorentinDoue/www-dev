import { NgModule } from '@angular/core';


import {SharedModule} from '../shared/shared.module';
import { HomeComponent } from './containers/home/home.component';
import {BookingsRoutingModule} from './bookings-routing.module';
import { RoomComponent } from './containers/room/room.component';
import { DayComponent } from './components/day/day.component';
import { DatePickerComponent } from './components/date-picker/date-picker.component';
import { SlotComponent } from './components/slot/slot.component';
import {StoreModule} from '@ngrx/store';
import {reducers} from './reducers';
import {EffectsModule} from '@ngrx/effects';
import {ReservationEffects} from './effects/reservation.effects';


@NgModule({
  imports: [
    SharedModule,
    BookingsRoutingModule,
    StoreModule.forFeature('booking', reducers),
    EffectsModule.forFeature([ReservationEffects]),
  ],
  declarations: [HomeComponent, RoomComponent, DayComponent, DatePickerComponent, SlotComponent]
})
export class BookingsModule { }
