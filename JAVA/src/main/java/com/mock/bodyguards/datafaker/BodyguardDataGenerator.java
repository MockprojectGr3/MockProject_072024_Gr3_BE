package com.mock.bodyguards.datafaker;

import com.github.javafaker.Faker;
import com.mock.bodyguards.entity.Bodyguard;

import java.util.Random;

public class BodyguardDataGenerator {
    private static final Random random = new Random();

    public static Bodyguard generateBodyguard() {
        Bodyguard bodyguard = new Bodyguard();
        bodyguard.setTimeSheetsId(random.nextInt(1000));
        bodyguard.setUserId(random.nextInt(1000));
        bodyguard.setJobId(random.nextInt(1000));
        bodyguard.setServiceId(random.nextInt(1000));
        return bodyguard;
    }
}