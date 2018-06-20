import { NgModule } from '@angular/core';
import { HobbiesComponent } from './hobbies/hobbies.component';
import {HobbiesRoutingModule} from './hobbies-routing.module';
import {SharedModule} from '../shared/shared.module';

@NgModule({
  imports: [
    SharedModule,
    HobbiesRoutingModule
  ],
  declarations: [HobbiesComponent]
})
export class HobbiesModule {
  constructor() {}
}
