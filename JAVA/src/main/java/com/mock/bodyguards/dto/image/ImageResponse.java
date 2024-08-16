package com.mock.bodyguards.dto.image;

import io.swagger.v3.oas.annotations.media.Schema;
import jakarta.validation.constraints.NotEmpty;
import lombok.Data;

@Data
@Schema(
        name = "ImageRequest",
        description = "Schema to hold image information"
)
public class ImageResponse {

    @Schema(
            name = "url",
            description = "URL of the image",
            type = "String",
            example = "https://example.com/image.png"
    )
    @NotEmpty(message = "URL cannot be empty")
    private String url;
}