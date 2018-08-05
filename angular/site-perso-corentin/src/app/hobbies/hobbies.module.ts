import { NgModule } from '@angular/core';
import { HobbiesComponent } from './hobbies/hobbies.component';
import {HobbiesRoutingModule} from './hobbies-routing.module';
import {SharedModule} from '../shared/shared.module';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';


@NgModule({
  imports: [
    SharedModule,
    HobbiesRoutingModule,
    NgbModule
  ],
  declarations: [HobbiesComponent]
})
export class HobbiesModule {
  constructor() {}
}
