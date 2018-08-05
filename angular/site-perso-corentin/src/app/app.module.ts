import {BrowserModule, HAMMER_GESTURE_CONFIG, HammerGestureConfig} from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {SharedModule} from './shared/shared.module';
import {AppRoutingModule} from './app-routing.module';
import { NotFoundComponent } from './not-found/not-found.component';
import { HomeComponent } from './home/home.component';
import {CoreModule} from './core/core.module';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';


declare var Hammer: any;

export class MyHammerConfig extends HammerGestureConfig  {
  buildHammer(element: HTMLElement) {
    return new Hammer(element, {
      touchAction: 'pan-y'
    });
  }
}

@NgModule({
  imports: [
    // angular
    BrowserAnimationsModule,
    BrowserModule,

    // core & shared
    NgbModule.forRoot(),
    SharedModule,
    CoreModule,

    // app
    AppRoutingModule,
  ],
  declarations: [
    AppComponent,
    NotFoundComponent,
    HomeComponent
  ],
  providers: [
    {
    // hammer instantion with custom config
    provide: HAMMER_GESTURE_CONFIG,
    useClass: MyHammerConfig ,
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
