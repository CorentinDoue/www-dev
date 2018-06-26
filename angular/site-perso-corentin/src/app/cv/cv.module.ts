import { NgModule } from '@angular/core';
import { CvHomeComponent } from './cv-home/cv-home.component';
import {CvRoutingModule} from './cv-routing.module';
import {SharedModule} from '../shared/shared.module';


@NgModule({
  imports: [
    SharedModule,
    CvRoutingModule
  ],
  declarations: [CvHomeComponent]
})
export class CvModule { }
