package com.mock.bodyguards.datafaker;

import com.github.javafaker.Faker;
import com.mock.bodyguards.entity.BodyguardTraining;
import com.mock.bodyguards.entity.Image;

public class ImageDataGenerator {
    private static final Faker faker = new Faker();

    public static Image generateImage(BodyguardTraining bodyguardTraining) {
        Image image = new Image();
        image.setUrl(faker.internet().url() + "/image" + faker.number().randomDigit() + ".png");
        image.setBodyguardTraining(bodyguardTraining);
        return image;
    }
}
