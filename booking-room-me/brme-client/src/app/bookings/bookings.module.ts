import { NgModule } from '@angular/core';


import {SharedModule} from '../shared/shared.module';
import { HomeComponent } from './components/home/home.component';
import {BookingsRoutingModule} from './bookings-routing.module';
import { RoomComponent } from './components/room/room.component';

@NgModule({
  imports: [
    SharedModule,
    BookingsRoutingModule,
  ],
  declarations: [HomeComponent, RoomComponent]
})
export class BookingsModule { }
